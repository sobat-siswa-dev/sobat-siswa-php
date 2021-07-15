<table border="1">
    <thead>
        <tr>
            <th style="border: 1px solid black; height: 25px;"><b>NIS</b></th>
            <th style="border: 1px solid black; height: 25px;"><b>Nama</b></th>
            <th style="border: 1px solid black; height: 25px;"><b>Kelas</b></th>
            <th style="border: 1px solid black; height: 25px;"><b>L/P</b></th>
            <th style="border: 1px solid black; height: 25px;"><b>Email</b></th>
            <th style="border: 1px solid black; height: 25px;"><b>Telp</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admStudentList as $admStudent)
            <tr>
                <td style="border: 1px solid black; width: 12px;">{{ $admStudent->nis }}</td>
                <td style="border: 1px solid black; width: 32px;">{{ $admStudent->name }}</td>
                <td style="border: 1px solid black; width: 14px;">{{ $admStudent->admClass() ? $admStudent->admClass()->name : '' }}</td>
                <td style="border: 1px solid black; width: 14px;">
                    @if ($admStudent->gender == 'L')
                        Laki-laki
                    @elseif ($admStudent == 'P') 
                        Perempuan
                    @endif
                </td>
                <td style="border: 1px solid black; width: 20px;">{{ $admStudent->email }}</td>
                <td style="border: 1px solid black; width: 17px;">{{ $admStudent->phone }}</td>
            </tr>
        @endforeach
    </tbody>
</table>