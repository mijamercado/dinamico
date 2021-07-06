<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <div>
    <select class="form-select" aria-label="Default select example" id="departamento" name="">
      <option selected>Selecciona un departamento</option>
      @foreach ($departamentos as $value)
        <option value="{{$value->id}}">{{$value->nombreDepartamento}}</option>     
      @endforeach
    </select>
  </div>
  <br>
  <div>
    <select class="form-select" aria-label="Default select example" name="" id="provincia">
      <option value=''>Seleccionar Provincia</option>
    </select>
  </div>
  
</body>
<script>
    const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;
    document.getElementById('departamento').addEventListener('change',(e)=>{
        fetch('provincias',{
            method : 'POST',
            body: JSON.stringify({texto : e.target.value}),
            headers:{
                'Content-Type': 'application/json',
                "X-CSRF-Token": csrfToken
            }
        }).then(response =>{
            return response.json()
        }).then( data =>{
            var opciones ="<option value=''>Seleccionar Provincia</option>";
            for (let i in data.lista) {
              console.log(data.lista[i].id)
              opciones+= '<option value="'+data.lista[i].id+'">'+data.lista[i].nombreProvincia+'</option>';
            }
            document.getElementById("provincia").innerHTML = opciones;
        }).catch(error =>console.error(error));
    });
</script>
</html>