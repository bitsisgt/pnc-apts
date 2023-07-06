<nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid mb-4 rounded">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown mr-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Citas
        </a>
        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown-1">
          <a class="dropdown-item" href="#">Recepción</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.appointment_management' ? 'active' : '' }}" href="{{ route('maintenance.appointment_management') }}">Gestión de Citas</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.availability' ? 'active' : '' }}" href="{{ route('maintenance.availability') }}">Disponibilidades</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.appointment_history' ? 'active' : '' }}" href="{{ route('maintenance.appointment_history') }}">Historial de Citas</a>
        </div>
      </li>
      <li class="nav-item dropdown mr-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Pacientes
        </a>
        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown-2">
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.inquiries_patient' ? 'active' : '' }}" href="{{ route('maintenance.inquiries_patient') }}">Consulta de Pacientes</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.patients' ? 'active' : '' }}" href="{{ route('maintenance.patients') }}">Gestión de Pacientes</a>
        </div>
      </li>
      <li class="nav-item dropdown mr-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-3" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Mantenimientos
        </a> 
        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown-3">
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.doctors' ? 'active' : '' }}" href="{{ route('maintenance.doctors') }}">Mantenimiento de Doctores</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.hospitals' ? 'active' : '' }}" href="{{ route('maintenance.hospitals') }}">Mantenimiento de Hospitales</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.specialities' ? 'active' : '' }}" href="{{ route('maintenance.specialities') }}">Mantenimiento de Especialidades</a>
        </div>
      </li>
      <li class="nav-item dropdown mr-4">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown-4" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Configuración
        </a>
        <div class="dropdown-menu dropdown-menu-dark" aria-labelledby="navbarDropdown-4">
          <a class="dropdown-item" href="#">Parámetros del Sistema</a>
          <a class="dropdown-item" href="#">Restablecer contraseñas</a>
          <a class="dropdown-item {{ Route::current()->getName()=='maintenance.users' ? 'active' : '' }}" href="{{ route('maintenance.users') }}">Mantenimiento de Usuarios</a>
        </div>
      </li>
      </ul>
    </div>
</nav>