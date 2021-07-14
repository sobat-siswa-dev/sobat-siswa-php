<table>
    <thead>
        <tr>
            <th><b>NIS</b></th>
            <th><b>Nama</b></th>
            <th><b>Kelas</b></th>
            <th><b>L/P</b></th>
            <th><b>Email</b></th>
            <th><b>Telp</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admStudentList as $admStudent)
            <tr>
                <td>{{ $admStudent->nis }}</td>
                <td>{{ $admStudent->name }}</td>
                <td>{{ $admStudent->admClass() ? $admStudent->admClass()->name : '' }}</td>
                <td>
                    @if ($admStudent->gender == 'L')
                        Laki-laki
                    @elseif ($admStudent == 'P') 
                        Perempuan
                    @endif
                </td>
                <td>{{ $admStudent->email }}</td>
                <td>{{ $admStudent->phone }}</td>
            </tr>
        @endforeach
    </tbody>
</table>