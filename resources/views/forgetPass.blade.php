
<form method='POST' action="{{ route('forgetPassword') }}">
@csrf
<input type='email' name='email'>
<button type ='submit'>send</button>
</form>