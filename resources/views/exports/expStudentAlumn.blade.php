<table border="1">
    <thead>
        <tr>
            <th style="border: 1px solid black;"><b>NIS</b></th>
            <th style="border: 1px solid black;"><b>Nama</b></th>
            <th style="border: 1px solid black;"><b>Angkatan</b></th>
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
        @foreach ($admStudentAlumnList as $admStudentAlumn)
            <tr>
                <td style="border: 1px solid black; width: 15px;">{{ $admStudentAlumn->nis }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->name }}</td>
                <td style="border: 1px solid black; width: 25px;">
                    @if ($admStudentAlumn->admAlumn())
                        Angkatan Tahun {{ $admStudentAlumn->admAlumn()->year }} 
                        @if ($admStudentAlumn->admAlumn()->name) 
                            ({{ $admStudentAlumn->admAlumn()->name }})
                        @endif
                    @endif
                </td>
                <td style="border: 1px solid black; width: 15px;">
                    @if ($admStudentAlumn->gender == 'L')
                        Laki-laki
                    @elseif ($admStudentAlumn == 'P') 
                        Perempuan
                    @endif
                </td>
                <td style="border: 1px solid black; width: 25px;">{{ $admStudentAlumn->place_birth }}, {{ date("d M Y", strtotime($admStudentAlumn->date_birth)) }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->name }}</td>
                <td style="border: 1px solid black; width: 25px;">{{ $admStudentAlumn->phone }}</td>
                <td style="border: 1px solid black; width: 35px;">{{ $admStudentAlumn->address }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->father_name }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->father_work }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->mother_name }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->mother_work }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->vice_name }}</td>
                <td style="border: 1px solid black; width: 30px;">{{ $admStudentAlumn->vice_work }}</td>
            </tr>
        @endforeach
    </tbody>
</table>