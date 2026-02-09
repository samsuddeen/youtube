<h1>we are here guys</h1>

{{-- @dd($tests ) --}}

@foreach ($tests as  $test)
<p>{{ $test->name }}</p>
<p>{{ $test->description }}</p>


@endforeach
