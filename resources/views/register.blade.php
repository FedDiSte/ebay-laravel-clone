<x-master>
    <x-slot name="show">
        none
    </x-slot>

    <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6 card">
                <form action="/register" method="POST" class="form-floating">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsername" placeholder="Username" name="username">
                        <label for="floatingUsername">Username</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingEmail" placeholder="name@example.com" name="email">
                        <label for="floatingEmail">Email address</label>
                      </div>
                      <div class="form-floating">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                        <label for="floatingPassword">Password</label>
                      </div>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</x-master>