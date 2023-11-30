@extends('layouts.admin')

@section('title', 'User Profile')

@section('content')
  <div class="container">
    <div class="main-body">
      <div class="row">
        <!-- Left Column -->
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                @if (!empty($user->foto))
                  <img src="{{ asset('storage/' . $user->foto) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                @else
                  <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                @endif
                <div class="mt-3">
                  <h4>{{ $user->name }}</h4>
                  <p class="text-secondary mb-1">Full Stack Developer</p>
                  <p class="text-muted font-size-sm">Role : {{ $user->role }}</p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
              <hr class="my-4">
            </div>
          </div>
        </div>

        <!-- Right Column -->
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <!-- FORM -->
              <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf

                <!-- Username -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" class="form-control @error('name') is-invalid @enderror"
                      required autocomplete="name" />

                    @error('name')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <!-- Email -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="email" name="email" value="{{ old('email', $user->email) }}"
                      class="form-control @error('email') is-invalid @enderror" />

                    @error('email')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <!-- Old Password -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Old Password</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="password" name="old_password" placeholder="********"
                      class="form-control @error('old_password') is-invalid @enderror" />

                    @error('old_password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <!-- New Password -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">New Password</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" />

                    @error('password')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                    @enderror
                  </div>
                </div>

                <!-- Confirm New Password -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Confirm New Password</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="password" name="password_confirmation" class="form-control" />
                  </div>
                </div>

                <!-- Foto -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Foto</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="file" name="foto" class="form-control" />
                  </div>
                </div>

                <!-- Role -->
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Role</h6>
                  </div>

                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="role" value="{{ $user->role }}" class="form-control" readonly />
                  </div>
                </div>

                <!-- Update Button -->
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <button type="submit" class="btn btn-primary px-4">{{ __('Update Profile') }}</button>
                  </div>
                </div>

              </form>
              <!-- END FORM -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
