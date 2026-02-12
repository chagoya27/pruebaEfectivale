<x-app-layout>
    <table  class="table table-striped table-hover">
        <!---Encabezados de la tabla---->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Mensaje</th>
            </tr>
        </thead>

        <!--mostrar registros de mensajes.json--->
        <tbody>
            @foreach ($messages as $message)
            <tr>
                <td>{{$message['name']}}</td>
                <td>{{$message['email']}}</td>
                <td>{{$message['message']}}</td>
            </tr>
            @endforeach
        </tbody> 
    </table>
</x-app-layout>




