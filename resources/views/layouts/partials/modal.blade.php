
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            +
        </button>

        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title w-100 text-center text-dark">Hozzáadás</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <div class="modal-body">

                        <form id="myForm" class="needs-validation" method="post" action="{{ route('posts') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                            <div class="container">

                                <div class="form-group row">
                                    <label for="id" class="col-sm-2 col-form-label text-dark">Cím</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="name_id" name="title"
                                            placeholder="Adj egy címet" required />
                                            <div class="invalid-feedback">
                                                Kérlek adj meg egy címet.
                                              </div>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="validationCustomUsername"  class="col-sm-2 col-form-label text-dark">Leírás</label>
                                    <div class="col-sm-10">
                                     <textarea lass="form-control" id="desc" name="content" placeholder="Leírás" cols="30" rows="10" aria-describedby="inputGroupPrepend" r required></textarea>
                                    </div>
</div>

                                 <div class="text-center">
                                 <button class="btn btn-success" type="submit">Hozzáadás</button>
                                 </div>
                            </div>
                        </form>

                        <script>
                           
                        </script>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Bezár</button>
                    </div>

                </div>
            </div>
        </div>