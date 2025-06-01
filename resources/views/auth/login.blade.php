<x-auth-layout>
    <h2>Login</h2>

    <form method="POST" action="{{ route('login.submit') }}">
    @csrf
      <div class="mb-3">
        <label for="username" class="form-label">username</label>
        <input type="text" class="form-control" id="email" name="username" required>
      </div>

      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>

      <button type="submit" class="btn btn-primary w-100">Login</button>
      <br><br>you don't have an account? <a style="text-decoration:none;" href="{{route('register')}}">signup</a>
    </form>
</x-auth-layout>
