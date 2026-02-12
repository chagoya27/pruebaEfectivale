<x-app-layout>
    <div class="d-flex justify-content-center flex-column align-items-center">
        <div id="responseMessage" class="col-4 mb-3"></div>
        <div class="mb-6"><h1 class="text-center fs-2" style="color: rgba(200, 20, 55, 0.75)">Formulario de Inicio</h1></div>
       
        <form class="col-11 col-sm-8 col-md-5" id="indexForm">
            @csrf

            <!--Campo Nombre-->
            <div class="mb-3">
                <label for="name" class="form-label" style="color: rgba(200, 20, 55, 0.75)">Nombre</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>

            <!--Campo Email-->
            <div class="mb-3">
                <label for="email" class="form-label" style="color: rgba(200, 20, 55, 0.75)">Email</label>
                <input type="email" class="form-control" id="email" name="email" >
            </div>

            <!--Campo Mensaje-->
            <div class="mb-3">
                <label for="message" class="form-label" style="color: rgba(200, 20, 55, 0.75)">Mensaje</label>
                <textarea class="form-control" id="message" rows="3" name="message"></textarea>
            </div>

            <div class="d-flex justify-content-center align-items-center flex-wrap"> 
                <button type="submit" class="btn btn-primary m-1">Enviar Formulario</button>
                <a href="{{route('message.index')}}" class="btn btn-secondary m-1">Mostrar registros</a>
            </div>
        </form>
    </div>
    


    <script>
        document.getElementById('indexForm').addEventListener('submit',function(e){
            //evitamos que la página se recarge
            e.preventDefault();

            //Obtención de los valores del formulario
            const name = document.getElementById('name').value;
            const email = document.getElementById('email').value;
            const message = document.getElementById('message').value;

            //validación de la información del formulario
            if(!name || !email || !message){
                alert ('Todos los campos son obligatorios');
                return;
            }

            // Preparamos los datos
            const formData = new FormData(this);

            //Envío con Fetch (AJAX)
            fetch('/guardar-mensaje', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(response => response.json())
            .then(data => {
                //Enviar mensaje para saber que el formulario se envio correctamente
                //y limpiamos campos del mismo
                const resDiv = document.getElementById('responseMessage');
                if (data.success) {
                    resDiv.innerHTML = `<div class="alert alert-success">${data.message}</div>`;
                    this.reset(); 

                    //Después de 3 segundos se elimina el mensaje de success
                    setTimeout(() => {
                        resDiv.innerHTML = '';
                    }, 3000);
                }
            })
            .catch(error => {
                console.error('Hubo un problema:', error);
                alert('No se pudo guardar los datos del formulario. Intenta de nuevo.');
            });
        }); 
    </script>
</x-app-layout>
   