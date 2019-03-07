<html>
<head>
    <meta charset="utf-8"/>
    <title>General Reports</title>
</head>
<body>

    <table class="table table-bordered " id="table">
        <thead>
        <tr class="filters">
            <th>Case No.</th>
            <th>Complainant Name</th>
            <th>Assigned To</th>
            <th>Filed By</th>
            <th>Status</th>
            <th>Date Filed</th>
        </tr>
        </thead>
        <tbody>

        @foreach($cases as $case)

            <tr>
                <td>{{ $case->case_number }}</td>
                <td>{{ $case->complainant->c_full_name }}</td>
                <td>
                    @if($case->investigator_id == null)

                        <label class="label label-info">Not Assigned</label>

                    @else

                        {{ $case->assigned_user->profile->full_name }}

                    @endif

                </td>
                <td>

                    {{ $case->user->profile->full_name }}

                </td>
                <td>
                    {{--{{ $case->case_status }}--}}
                    @if($case->case_status == 0)
                        <label class="label label-primary">Case Opened</label>
                    @elseif($case->case_status == 1)
                        <label class="label label-warning">Under Investigation</label>
                    @elseif($case->case_status == 2)
                        <label class="label label-success">Case Closed</label>
                    @endif

                </td>
                <td>
                    {{ $case->created_at }}
                </td>

            </tr>

        @endforeach

        </tbody>
    </table>

</body>

</html>
