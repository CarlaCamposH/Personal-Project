@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="max-w rounded overflow-hidden shadow-lg">
                <div class="px-6 py-4">
                    <div class="text-pink-500">
                        <p
                            class="font-extrabold text-transparent text-8xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400">
                            TITULO CHULO <i class="fa-solid fa-fire"></i></p>
                    </div>
                    <form action="/fase2" method="POST" id="fase2">
                        @csrf
                        <div>
                            <label
                                class="font-bold text-transparent text-2xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400">Fullname</label>
                            <input type="text" id="name"
                                class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <label
                                class="font-bold text-transparent text-2xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400">Age</label>
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <input id="age" datepicker datepicker-autohide datepicker-format="yyyy-mm-dd"
                                    type="text"
                                    class="mt-2 bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-pink-500 focus:border-pink-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 datepicker-input"
                                    placeholder="Select date" required>
                                <input type="hidden" id="data" name="data">
                            </div>
              
                            <label
                            class="font-bold text-transparent text-2xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400">
                            Profile Photo</label>

                            <button class="mt-2 block text-white bg-gradient-to-r from-orange-400 to-pink-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="defaultModal">
                                Upload ur photo! <i class="fa-solid fa-camera"></i>
                              </button>

                            <button onclick="submitA()"
                                class="mt-4 text-white bg-gradient-to-br from-pink-500 to-orange-400 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-pink-200 dark:focus:ring-pink-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2"
                                name="cmd" value="save">I'm goin' in!</button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Main modal -->
  <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
      <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
          <!-- Modal content -->
          <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
              <!-- Modal header -->
              <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                  <h1 id="title1" class="font-bold text-transparent text-2xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400">
                    Upload ur profile photo!  <i class="fa-solid fa-camera"></i>
                  </h1>
                  <h1 id="title2" class="hidden font-bold text-transparent text-2xl bg-clip-text bg-gradient-to-br from-pink-500 to-orange-400">
                    Adjust ur photo!  <i class="fa-solid fa-camera"></i>
                  </h1>
                  <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                      <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                  </button>
              </div>
              <!-- Modal body -->
              
              
          <div class="flex items-center justify-center w-full">
              <label id="hideLabel"
                  class="flex flex-col w-full m-4 h-32 bg-gradient-to-br from-pink-500/20 to-orange-400/20 border-4 border-pink-200 border-dashed hover:bg--gradient-to-br from-pink-500 to-orange-400 hover:border-orange-200 rounded">
                  <div class="flex flex-col items-center justify-center pt-7">
                      <svg xmlns="http://www.w3.org/2000/svg"
                          class="w-8 h-8 text-pink-500/50 group-hover:text-gray-600" fill="none"
                          viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                      </svg>
                      <p
                          class="pt-1 font-bold text-transparent text-l bg-clip-text bg-gradient-to-br from-pink-500/50 to-orange-400/50">
                          Attach a file</p>
                  </div>
                  <input type="file" class="opacity-0" id="pfp" {{--onchange="previewPfp()"--}}/>
              </label>
              {{--<img src="" height="200" id="prev" class="p-3 rounded-b hidden"> <br>--}}
          </div>
          <div id="editor"></div><br>
          <canvas id="preview" class="hidden" ></canvas>
          <div id="resetP" class="hidden flex items-center justify-center pl-3 pb-3">
                <button onclick="resetphoto()" type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Select another Photo <i class="fa-solid fa-arrow-rotate-right"></i></button>
            </div>
              <!-- Modal footer -->
              <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                  <button data-modal-toggle="defaultModal" type="button" class="text-white bg-gradient-to-br from-green-400 to-blue-500 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I feel pretty <i class="fa-solid fa-star"></i></button>
                  <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Nah...</button>
              </div>
          </div>
      </div>
  </div>
  <input type="hidden" id="base64foto" value="">
  <code id="base64" class="hidden"></code>

<script>
    //función para enviar los datos al controlador
    function submitA() {
        var form = document.getElementById("fase2");
        var birthDate = document.getElementById("age");
        var name = document.getElementById("name");
        //var image = document.getElementById("pfp");
        //var separatedImage = image.value.split("\\");
        var imageBase64 = document.getElementById("base64foto");
        console.log(imageBase64);
        alert(imageBase64);
        
        //var ultimo = separatedImage.pop();
        var age = ageCalculator(birthDate.value);

        var data = document.getElementById("data");
        var sendData = [name.value, age, imageBase64.value];
        data.value = JSON.stringify(sendData);

        form.submit();
    }
    //función para calcular la edad
    function ageCalculator(birthDate) {
        var today = new Date();
        var bDate = new Date(birthDate);
        var age = today.getFullYear() - bDate.getFullYear();
        var m = today.getMonth() - bDate.getMonth();

        if (m < 0 || (m === 0 && today.getDate() < bDate.getDate())) {
            age--;
        }
        return age;
    }

    //previsualizar la foto de perfil
   const title1=document.getElementById("title1");
   const title2=document.getElementById("title2");
   const inputImage = document.querySelector('#pfp');
   const editor = document.querySelector('#editor');
   const miCanvas = document.getElementById("preview");
   const contexto = miCanvas.getContext('2d');
   let urlImage = undefined;
   inputImage.addEventListener('change', abrirEditor, false);

    function resetphoto(){
        var showLabel = document.getElementById('hideLabel');
        var showReset = document.getElementById('resetP');
        var prev = document.getElementById('prev');
        var editor = document.getElementById('editor');

        showLabel.style.display="block";
        showReset.style.display="none";
        title1.style.display="block";
        title2.style.display="none";
        //prev.style.display="none";
        editor.style.display="none";

    }

             function abrirEditor(e) {
                 // Obtiene la imagen
                 urlImage = URL.createObjectURL(e.target.files[0]);
                 var showLabel = document.getElementById('hideLabel');
                 var showReset = document.getElementById('resetP');
                 // Borra editor en caso que existiera una imagen previa
                 editor.innerHTML = '';
                 let cropprImg = document.createElement('img');
                 cropprImg.setAttribute('id', 'croppr');
                 editor.appendChild(cropprImg);

                 // Limpia la previa en caso que existiera algún elemento previo
                 contexto.clearRect(0, 0, miCanvas.width, miCanvas.height);

                 // Envia la imagen al editor para su recorte
                 document.querySelector('#croppr').setAttribute('src', urlImage);

                 // Crea el editor
                 new Croppr('#croppr', {
                     aspectRatio: 1,
                     startSize: [70, 70],
                     onCropEnd: recortarImagen
                 })

                 showLabel.style.display="none";
                showReset.style.display="block";
                editor.style.display="block";
                title1.style.display="none";
                title2.style.display="block";
             }

             /**
              * Método que recorta la imagen con las coordenadas proporcionadas con croppr.js
              */
             function recortarImagen(data) {
                 // Variables
                 const inicioX = data.x;
                 const inicioY = data.y;
                 const nuevoAncho = data.width;
                 const nuevaAltura = data.height;
                 const zoom = 1;
                 let imagenEn64 = '';
                 // La imprimo
                 miCanvas.width = nuevoAncho;
                 miCanvas.height = nuevaAltura;
                 // La declaro
                 let miNuevaImagenTemp = new Image();
                 // Cuando la imagen se carge se procederá al recorte
                 miNuevaImagenTemp.onload = function() {
                     // Se recorta
                     contexto.drawImage(miNuevaImagenTemp, inicioX, inicioY, nuevoAncho * zoom, nuevaAltura * zoom, 0, 0, nuevoAncho, nuevaAltura);
                     // Se transforma a base64
                     imagenEn64 = miCanvas.toDataURL("image/jpeg");
                     // Mostramos el código generado
                     document.querySelector('#base64foto').value = imagenEn64;
                 }
                 // Proporciona la imagen cruda, sin editarla por ahora
                 miNuevaImagenTemp.src = urlImage;
             }

</script>
@endsection
