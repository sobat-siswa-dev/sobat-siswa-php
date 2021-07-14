<table>
    <tr>
        <td><b>NIS</b></td>
        <td colspan="2">: {{ $admStudent->nis }}</td>
    </tr>
    <tr>
        <td><b>Nama</b></td>
        <td colspan="2">: {{ $admStudent->name }}</td>
    </tr>
    <tr>
        <td><b>Kelas</b></td>
        <td colspan="2">: {{ $admStudent->admClass() ? $admStudent->admClass()->name : '' }}</td>
    </tr>
    <tr>
        <td><b>Jumlah Pelanggaran</b></td>
        <td colspan="2">: {{ count($behViolationList) + 0 }} Pelanggaran</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td width="20"><b>Tanggal</b></td>
        <td width="45"><b>Tata Tertib</b></td>
        <td width="10"><b>Poin</b></td>
    </tr>
    @foreach ($behViolationList as $behViolation)
        <tr>
            <td>{{ date("d M Y", strtotime($behViolation->get_at)) }}</td>
            <td>{{ $behViolation->code }}. {{ $behViolation->description }}</td>
            <td>{{ $behViolation->poin + 0 }} Poin</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="2"><b>Jumlah</b></td>
        <td>
            <?php
                $behViolationPoin = 0;
                foreach ($behViolationList as $behViolation) {
                    $behViolationPoin += $behViolation->poin;
                }
                echo ($behViolationPoin + 0) . " Poin";
            ?>
        </td>
    </tr>
</table>