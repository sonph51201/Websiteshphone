@if (!empty($_SESSION['errors']))
    <div class="alert alert-danger">
        <ul>
            @foreach ($_SESSION['errors'] as $error)
                @if (is_array($error))
                    @foreach ($error as $e)
                        <li>{{ htmlentities($e) }}</li>
                    @endforeach
                @else
                    <li>{{ htmlentities($error) }}</li>
                @endif
            @endforeach
        </ul>
    </div>

    @php
        unset($_SESSION['errors']);
    @endphp
@endif
