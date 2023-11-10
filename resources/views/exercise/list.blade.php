<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Exercise MCK</title>
  <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css' />
  <link rel='stylesheet'
    href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css' />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" />
</head>
<body>
  <div class="container">
    <div class="row my-5">
      <div class="col-lg-12">
        <h2>Exercise MCK</h2>
        <div class="card shadow">
          <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="text-light">Manage Employees</h3>
            <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addStatesModal"><i class="bi-plus-circle me-2"></i>Add States</button>
          </div>
          <div class="card-body">
            <table class="table table-striped align-middle" id="show_all_states">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>pob</th>
                        <th>viv</th>
                        <th>cvegeo</th>
                        <th>pob_fem</th>
                        <th>pob_mas</th>
                        <th>cve_agee</th>
                        <th>nom_agee</th>
                        <th>nom_abrev</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($states_data as $state)
                        <tr>
                            <td>{{ $state->id }}</td>
                            <td>{{ $state->pob }}</td>
                            <td>{{ $state->viv }}</td>
                            <td>{{ $state->cvegeo }}</td>
                            <td>{{ $state->pob_fem }}</td>
                            <td>{{ $state->pob_mas }}</td>
                            <td>{{ $state->cve_agee }}</td>
                            <td>
                                <a href="#" id="{{ $state->id }}" viv="{{ $state->viv }}" pob="{{ $state->pob }}" cve_agee="{{ $state->cve_agee }}" state="{{ $state->nom_agee }}" nom_abrev="{{ $state->nom_abrev }}" class="text-success mx-1" data-bs-toggle="modal" data-bs-target="#viewStateModal">{{ $state->nom_agee }}</a>
                            </td>
                            <td>{{ $state->nom_abrev }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{--
            <h1 class="text-center text-secondary my-5">Loading...</h1>
            --}}
          </div>
        </div>
      </div>
    </div>
  </div>


  {{-- new states modal --}}
<div class="modal fade" id="addStatesModal" tabindex="-1" aria-labelledby="exampleModalLabel"
  data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add States</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="#" method="POST" id="add_states_form" enctype="multipart/form-data">
        @csrf

        <div class="modal-body p-4 bg-light">
            Para insertar los datos desde la API, de clic en el botón Add States
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" id="add_states_btn" class="btn btn-primary">Add States</button>
        </div>
      </form>
    </div>
  </div>
</div>

{{-- Information modal --}}
<div class="modal fade" id="viewStateModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-backdrop="static" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form>
        <div class="modal-body p-4 bg-light">
          <div class="row">
            <div class="col-lg">
                <label for="lname">POB</label>
                <input type="text" id="fpob" class="form-control" readonly />
            </div>
            <div class="col-lg">
                <label for="fname">VIV</label>
                <input type="text" id="fviv" class="form-control" readonly />
            </div>
          </div>

          <div class="row">
            <div class="col-lg">
              <label for="fname">CVE</label>
              <input type="text" id="fcve_agee" class="form-control" readonly />
            </div>
            <div class="col-lg">
                <label for="fname">ABREV</label>
                <input type="text" id="fnom_abrev" class="form-control" readonly />
            </div>
          </div>

          <div class="my-2">
            <label for="lname">STATE</label>
            <input type="text" id="fstate" class="form-control" readonly />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

  <script src='https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js'></script>
  <script src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js'></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    $(function() {
        $('#show_all_states').DataTable();

      // add ajax request
      $("#add_states_form").submit(function(e) {
        e.preventDefault();
        const fd = new FormData(this);
        $("#add_states_btn").text('Adding...');

        $.ajax({
          url: '{{ route('states.store') }}',
          method: 'post',
          data: fd,
          cache: false,
          contentType: false,
          processData: false,
          dataType: 'json',
          success: function(response) {
            if (response.status == 200) {
              Swal.fire(
                'Added!',
                'States Added Successfully!',
                'success'
              )

              window.location.reload();
            }
            $("#add_states_btn").text('Add States');
            $("#add_states_form")[0].reset();
            $("#addStatesModal").modal('hide');
          }
        });
      });

      // show information
        $(document).on('click', '.text-success', function(e) {
            e.preventDefault();
            $("#fpob").val($(this).attr('pob'));
            $("#fviv").val($(this).attr('viv'));
            $("#fstate").val($(this).attr('state'));
            $("#fcve_agee").val($(this).attr('cve_agee'));
            $("#fnom_abrev").val($(this).attr('nom_abrev'));
        });
    });
  </script>
</body>
</html>
