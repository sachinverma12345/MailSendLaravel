<x-app-layout>
    <div class="py-12">
        <div class="content pl-5 pr-5">
            <div class="row p-4">
                <div class="col-md-2"></div>
                <div class="col-md-8 ">
                    @if ($currentUserInfo)
                        <table class="table table-bordered text-left">
                            <tr>
                                <th>IP Address : </th>
                                <td> {{ $currentUserInfo->ip }} </td>
                            </tr>
                            <tr>
                                <th>City : </th>
                                <td> {{ $currentUserInfo->cityName }} </td>
                            </tr>
                            <tr>
                                <th>State : </th>
                                <td> {{ $currentUserInfo->regionName }} </td>
                            </tr>

                        </table>
                    @else
                        <p>Unable to retrieve location information.</p>
                    @endif
                </div>
                <div class="col-md-2"></div>
            </div>

        </div>
    </div>
</x-app-layout>
