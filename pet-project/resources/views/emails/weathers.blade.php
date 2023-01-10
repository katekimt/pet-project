@component('mail::message')
    Dear {{$email}},
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">Date</th>
            <th scope="col">Minimum Temperature</th>
            <th scope="col">Maximum Temperature</th>
        </tr>
        </thead>
        <tbody>
        @for($i = 0; $i < count($data['time']); $i++)
            <tr>
                <td>{{$data['time'][$i]}}</td>
                <td>{{$data['temperature_2m_min'][$i]}}</td>
                <td>{{$data['temperature_2m_max'][$i]}}</td>
            </tr>
        @endfor
        </tbody>
    </table>
@endcomponent
