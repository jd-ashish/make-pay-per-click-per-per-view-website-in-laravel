<div class="table-responsive">
    @php
        // print_r($user);
    @endphp
    <table id="" class="table table-bordered table-hover display getUser" style="width:100%">
        <thead>
            <tr>
                <th>id</th>
                <th>IP</th>
                <th>Device</th>
                <th>browser</th>
                <th>OS</th>
                <th>created</th>
                <th>status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($user as $key => $value)
                @php
                    $arr = json_decode($value->login_log);
                @endphp
                @foreach ($arr as $k => $item)
                    <tr>
                        <td>#{{ ($k+1) }}</td>
                        <td>{{ json_decode($item->json)->ip }}</td>
                        <td>{{ json_decode($item->json)->getbrowser }}</td>
                        <td>{{ json_decode($item->json)->getdevice }}</td>
                        <td>{{ json_decode($item->json)->getos }}</td>
                        <td>{{ Time_ago(strtotime($item->created_at)) }}</td>
                        <td>{{ $item->status }}</td>
                    </tr>
                @endforeach
                
            @endforeach
            
        </tbody>
    </table>
</div>