@foreach($admStudentList as $admStudent)
    <tr>
        <td>
            <span style="font-size: .95em; text-decoration: none;">
                {{ $admStudent->nis }}
            </span>
        </td>
        <td>
            <span style="font-size: .95em; text-decoration: none;">
                {{ $admStudent->name }}
            </span>
        </td>
        <td>
            <a href="{{ $requestUrl . $admStudent->id }}" class="btn btn-sm btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="12" cy="12" r="2" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg> Lihat
            </a>
        </td>
    </tr>
@endforeach
@if (count($admStudentList) == false)
    <tr>
        <td colspan="3">
            <div class="my-3 mt-2">
                <img class="d-block m-auto" style="width: 200px; max-width: 100%;" src="{{ asset('./staticRes/empty.png') }}" alt="">
                <h3 class="text-center" style="color: #2e576d; font-weight: bolder;">
                    Tidak ada data
                </h3>
            </div>
        </td>
    </tr>
@endif