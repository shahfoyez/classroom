<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Assignment PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />

    <script src="{{ asset('js/script.js') }}" defer></script>

    <!-- PDF Preview-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-3">{{  $assignment->title }}</h2>
        <div class="col-lg-12">
            @error('points')
                <div x-data="{ show:true }"
                    x-init="setTimeout(() => show = false, 4000)"
                    x-show="show"
                    class="pb-0">
                    <div class="alert alert-warning" role="alert">
                        <p class="error text-danger" style="font-size: 15px; margin-bottom:0px">{{ $message }}</p>
                    </div>
                </div>
            @enderror
            @if (session()->has('message'))
                <div x-data="{ show:true }"
                    x-init="setTimeout(() => show = false, 4000)"
                    x-show="show"
                    class="alert alert-success pb-0">
                    <p>{{ session('message') }}</p>
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-end mb-4">
            <a href="#" onclick="window.print()" class="btn btn-primary">Export to PDF</a>
        </div>
        <table class="table table-bordered mb-5">
                <thead>
                  <tr>
                    <th width="70%" scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col">Grade</th>
                  </tr>
                </thead>
                @php
                    $totalLate=0;
                    $totalGraded=0;
                @endphp
                @foreach ($members as $member)
                    <tbody>
                        <tr>
                            <td>
                                <img src="{{ asset('uploads/profiles/'.$member->user->image) }}" width="30" height="30" alt="..." class="rounded-circle mr-2 mb-2 float-left">
                                {{ $member->user->fname." ".$member->user->lname }}
                            </td>
                            {{-- Check if assignment as submission --}}
                            @php
                                $sub=0;
                            @endphp
                            @if ($assignment->assignmentSubmission->count()>0)
                                {{-- Submissions against a assignment --}}
                                @foreach ($assignment->assignmentSubmission as $submission)
                                    @if ($submission->user_id == $member->user->id )
                                        @php
                                            $sub=1;
                                        @endphp
                                        @break
                                    @else
                                        @php
                                            $sub=0;
                                        @endphp
                                    @endif
                                @endforeach
                                @if ($sub==1)
                                    <td>
                                        @if ($submission->grade)
                                            @php
                                                $totalGraded++;
                                            @endphp
                                        @endif
                                        @if ($submission->created_at->format('Y-m-d') > $assignment->due_date)
                                            @php
                                                 $totalLate++;
                                            @endphp
                                            <h6 style="color: rgb(218, 205, 27);">Late</h6>
                                        {{-- Note: One submission has one grade --}}
                                        @elseif($submission->grade)
                                            @if ($submission->grade->as_id==$submission->id)
                                                <h6 class="graded" style="color: rgb(58, 66, 175);">Graded</h6>
                                            @endif
                                        @else
                                            <h6 style="color: green;">Submitted</h6>
                                        @endif
                                    </td>
                                    <form method="post" action="/gradeSubmit/{{ $submission->id }}" enctype="multipart/form-data">
                                        @csrf
                                        <td>
                                            <input name="points" type="number"
                                                {{-- Current list member Submission has been graded? --}}
                                                @if ($submission->grade )
                                                    @if ($submission->id == $submission->grade->as_id)
                                                        value="{{ $submission->grade->points }}"
                                                    @else
                                                        placeholder="{{ ':(' }}"
                                                    @endif
                                                @else
                                                    placeholder="{{ ':(' }}"
                                                @endif
                                            >
                                        </td>
                                    </form>
                                @else
                                    <td class="missing"><h6>Missing</h6> </td>
                                @endif
                            @else
                                <td class="missing"><h6>Missing</h6> </td>
                            @endif
                        </tr>
                    </tbody>
                    @php
                        $totalSub= $assignment->assignmentSubmission->count();
                        $totalMissing= $members->count()-$totalSub;
                    @endphp
                @endforeach
        </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- Core plugin JavaScript-->
<script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
<!-- Custom scripts for all pages-->
<script src="{{ asset('js/sb-admin-2.min.js') }}"></script>
<script>
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable({
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                { "orderable": false, "targets": [1, 4]}
            ]
        });
    } );
</script>
<script type="text/javascript">
    @if (count($errors) > 0)
        $('#validationError').modal('show');
    @endif
</script>
