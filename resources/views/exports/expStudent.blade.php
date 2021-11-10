<table border="1">
    <thead>
        <tr>
            <th style="border: 1px solid black;"><b>NIS</b></th>
            <th style="border: 1px solid black;"><b>Nama</b></th>
            <th style="border: 1px solid black;"><b>Kelas</b></th>
            <th style="border: 1px solid black;"><b>L/P</b></th>
            <th style="border: 1px solid black;"><b>Tempat/Tanggal Lahir</b></th>
            <th style="border: 1px solid black;"><b>Email</b></th>
            <th style="border: 1px solid black;"><b>Telp</b></th>
            <th style="border: 1px solid black;"><b>Alamat</b></th>
            <th style="border: 1px solid black;"><b>Nama Ayah</b></th>
            <th style="border: 1px solid black;"><b>Pekerjaan Ayah</b></th>
            <th style="border: 1px solid black;"><b>Nama Ibu</b></th>
            <th style="border: 1px solid black;"><b>Pekerjaan Ibu</b></th>
            <th style="border: 1px solid black;"><b>Nama Wali</b></th>
            <th style="border: 1px solid black;"><b>Pekerjaan Wali</b></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($admStudentList as $admStudent)
            <tr>
                <td style="border: 1px solid black; width: 15px;">{{ $admStudent->nis }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->name }}</td>
                <td style="border: 1px solid black; width: 20px;">{{ $admStudent->admClass() ? $admStudent->admClass()->name : '' }}</td>
                <td style="border: 1px solid black; width: 15px;">
                    @if ($admStudent->gender == 'L')
                        Laki-laki
                    @elseif ($admStudent == 'P') 
                        Perempuan
                    @endif
                </td>
                <td style="border: 1px solid black; width: 25px;">{{ $admStudent->place_birth }}, {{ date("d M Y", strtotime($admStudent->date_birth)) }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->name }}</td>
                <td style="border: 1px solid black; width: 25px;">{{ $admStudent->phone }}</td>
                <td style="border: 1px solid black; width: 35px;">{{ $admStudent->address }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->father_name }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->father_work }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->mother_name }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->mother_work }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->vice_name }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudent->vice_work }}</td>
            </tr>
        @endforeach
    </tbody>
</table>