<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Gestione Studenti') }}
            </h2>
        </div>
    </x-slot>
<div class="btn-toolbar mb-2 mb-md-0">
<a href="javascript:void(0)" onClick="add()" class="btn btn-sm btn-gray-800 d-inline-flex align-items-center">
            <svg class="icon icon-xs me-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                </path>
            </svg>
            Aggiungi Studente
        </a>
    
</div>

<div style="margin: 0 auto;">

<h2 class="mb-4"></h2>    

<table class="table table-bordered" id="products">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Telefono</th>
                    <th>Data</th>
                    <th width="80px;">Modifica</th>
            </tr>
        </thead>
    </table>
</div>
   

<script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>


<!-- boostrap product model -->
<div class="modal fade" id="product-modal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="ProductModal"></h4>
                </div>
                <div class="modal-body">
                    <form action="javascript:void(0)" id="ProductForm" name="ProductForm" class="form-horizontal"
                        method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" id="id">
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nome</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="name" name="name"
                                    placeholder="Nome" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-12">
                                <input type="email" class="form-control" id="email" name="email"
                                    placeholder="Email" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="usernamename" class="col-sm-2 control-label">Username</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Username" maxlength="50" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone" class="col-sm-2 control-label">Telefono</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" id="phone" name="phone"
                                    placeholder="Telefono" maxlength="50" required="">
                            </div>
                        </div>
                       
                        <div class="col-md-6 mb-3">
                            <label for="dob">Compleanno</label>
                            <div class="input-group">
                                <span class="input-group-text"><svg class="icon icon-xs" fill="currentColor"
                                        viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                            clip-rule="evenodd"></path>
                                    </svg></span>
                                <input data-datepicker=""
                                    class="form-control datepicker-input" id="dob" type="text" name="dob"
                                    placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-outline-primary" id="btn-save">Salva
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>
    <!-- end bootstrap model -->


    <script type="text/javascript">
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('#products').DataTable({
            processing: true,
            serverSide: true,
            pageLength : 15,
            ajax: "{{ route('students.list') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'username', name: 'username'},
                {data: 'phone', name: 'phone'},
                {data: 'dob', name: 'dob'},
                {
                    data: 'action', 
                    name: 'action', 
                    orderable: true, 
                    searchable: true
                },
            ],
            language: {
	            "sEmptyTable":     "Nessun dato presente nella tabella",
	            "sInfo":           "Vista da _START_ a _END_ di _TOTAL_ elementi",
	            "sInfoEmpty":      "Vista da 0 a 0 di 0 elementi",
	            "sInfoFiltered":   "(filtrati da _MAX_ elementi totali)",
	            "sInfoPostFix":    "",
	            "sInfoThousands":  ".",
	            "sLengthMenu":     "Visualizza _MENU_ elementi",
	            "sLoadingRecords": "Caricamento...",
	            "sProcessing":     "Elaborazione...",
	            "sSearch":         "Cerca:",
	            "sZeroRecords":    "La ricerca non ha portato alcun risultato.",
	            "oPaginate": {
		            "sFirst":      "Inizio",
		            "sPrevious":   "Precedente",
		            "sNext":       "Successivo",
		            "sLast":       "Fine"
	            },
	            "oAria": {
		            "sSortAscending":  ": attiva per ordinare la colonna in ordine crescente",
		            "sSortDescending": ": attiva per ordinare la colonna in ordine decrescente"
	            }
            }

            });

        });

        function add() {
            $('#ProductForm').trigger("reset");
            $('#ProductModal').html("Nuovo record");
            $('#product-modal').modal('show');
            $('#id').val('');
        }

        function editFunc(id) {
            $.ajax({
                type: "POST",
                url: "{{ url('edit-product') }}",
                data: {
                    id: id
                },
                dataType: 'json',
                success: function(res) {
                    $('#ProductModal').html("Modifica dati");
                    $('#product-modal').modal('show');
                    $('#id').val(res.id);
                    $('#name').val(res.name);
                    $('#email').val(res.email);
                    $('#username').val(res.username);
                    $('#phone').val(res.phone);
                    $('#dob').val(res.dob);
                    
                }
            });
        }

        function deleteFunc(id) {
            if (confirm("Elimina record?") == true) {
                var id = id;
                // ajax
                $.ajax({
                    type: "POST",
                    url: "{{ url('delete-product') }}",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(res) {
                        var oTable = $('#products').dataTable();
                        oTable.fnDraw(false);
                        const notyf = new Notyf({
                            position: {
                                x: 'right',
                                y: 'top',
                            },
                            types: [
                                {
                                    type: 'info',
                                    background: 'green',
                                    dismissible: false
                                }
                            ]
                        });
                        notyf.open({
                            type: 'info',
                            message: 'Dati salvati con successo.'
                        });
                    }
                });
            }
        }
        $('#ProductForm').submit(function(e) {
            e.preventDefault();
            var formData = new FormData(this);
            $.ajax({
                type: 'POST',
                url: "{{ url('store-product') }}",
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success: (data) => {
                    $("#product-modal").modal('hide');
                    var oTable = $('#products').dataTable();
                    oTable.fnDraw(false);
                    $("#btn-save").html('Submit');
                    $("#btn-save").attr("disabled", false);
                    const notyf = new Notyf({
                        position: {
                            x: 'right',
                            y: 'top',
                        },
                        types: [
                            {
                                type: 'info',
                                background: 'green',
                                dismissible: false
                            }
                        ]
                    });
                    notyf.open({
                        type: 'info',
                        message: 'Dati salvati con successo.'
                    });
                },
                error: function(data) {
                    console.log(data);
                }
            });
        });
        
    </script>
</x-app-layout>
