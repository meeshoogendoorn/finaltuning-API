@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card dark-card">
                    <div class="card-header">
                        <h2><strong>Tuner Info</strong></h2>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <select id="manufacturer-select" class="form-control">
                                <option value="">Kies Auto Merk</option>
                                @foreach($manufacturers as $manufacturer)
                                    <option value="{{$manufacturer}}">{{$manufacturer}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="modelSelect" class="form-control" disabled>
                                <option value="">Kies Model</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="generationSelect" class="form-control" disabled>
                                <option value="">Kies Generatie</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select id="engineSelect" class="form-control" disabled>
                                <option value="">Kies Motor Type</option>
                            </select>
                        </div>
                        <div id="json_output"></div>
                        @push('js')
                            <script>
                                $("#manufacturer-select").on("change", function(){
                                    axios.get("/auth/models/"+$(this).val())
                                        .then(function(resp){
                                            let responseBody = resp.data;
                                            if(responseBody.success)
                                                createModelSelect(responseBody.data)
                                        })
                                });

                                $("#modelSelect").on("change", function(){
                                    let manufacturer = $("#manufacturer-select").val();
                                   axios.get("/auth/generations/"+manufacturer+"/"+$(this).val())
                                   .then(function(resp){
                                       let responseBody = resp.data;
                                       if(responseBody.success)
                                           createGenerationsSelect(responseBody.data)
                                   })
                                });

                                $("#generationSelect").on("change", function(){
                                    axios.get("/auth/engines/"+$(this).val())
                                    .then(function(resp){
                                        let responseBody = resp.data;
                                        if(responseBody.success)
                                            createEngineSelect(responseBody.data);
                                    })
                                });

                                $("#engineSelect").on("change", function(){
                                    axios.get("/auth/info/"+$(this).val())
                                    .then(function(resp){
                                        let responseBody = resp.data;
                                        if(responseBody.success){
                                            $("#json_output").html("");
                                            document.getElementById("json_output").innerHTML = "<pre style=\"color: #fff;\">"+JSON.stringify(responseBody.data,undefined, 2) +"</pre>"
                                        }
                                    })
                                });

                                function createEngineSelect(data) {
                                    let engineSelect = $("#engineSelect");
                                    $(".engine-select-option").remove();

                                    for (let i = 0; i < data.length; i++) {
                                        let option = document.createElement("option");
                                        option.innerText = data[i]["engine"].replace("-BHP", " PK");
                                        option.value = data[i]["result_id"];
                                        option.className = "engine-select-option";
                                        engineSelect.append(option);
                                    }

                                    engineSelect.removeAttr("disabled");
                                }

                                function createGenerationsSelect(data){
                                    let generationSelect = $("#generationSelect");
                                    $(".generation-select-option").remove();
                                    $(".engine-select-option").remove();
                                    $("#engineSelect").attr("disabled", "disabled");
                                    if (data.length < 1) {
                                        $("#engineSelect").removeAttr("disabled");
                                        retrieveEngines();
                                    }
                                    for (let i = 0; i < data.length; i++) {
                                        let key = Object.keys(data[i])[0];
                                        let option = document.createElement("option");
                                        option.innerText = data[i][key].replace("(", "").replace(")", "");
                                        option.value = key;
                                        option.className = "generation-select-option";
                                        generationSelect.append(option);
                                    }
                                    generationSelect.removeAttr("disabled");
                                }

                                function createModelSelect(data){
                                    let modelSelect = $("#modelSelect");
                                    $(".model-select-option").remove();
                                    $(".generation-select-option").remove();
                                    $(".engine-select-option").remove();
                                    $("#engineSelect").attr("disabled", "disabled");
                                    $("#controlLineSelect").attr("disabled", "disabled");

                                    for (let i = 0; i < data.length; i++) {
                                        let option = document.createElement("option");
                                        option.innerText = data[i];
                                        option.value = data[i];
                                        option.className = "model-select-option";
                                        modelSelect.append(option);
                                    }
                                    modelSelect.removeAttr("disabled");
                                }
                            </script>
                        @endpush
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
