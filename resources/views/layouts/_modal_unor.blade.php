<div class="modal fade" id="modal-unor" >
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modal-title">Modal Dialog</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
                <div class="modal-body">
    
                        <form action="{{ route('m_unor.store') }}" method="POST">
                                @csrf
                              
                                 <div class="row"> 
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <strong>Nama SKPD</strong>
                                            <textarea class="form-control" style="height:150px" name="nama_m_skpd" id="nama_m_skpd"></textarea>
                                        </div>
                                    </div>
                                    
                                </div> 
                                <ol class="pull-right">
                                    <button type="submit" class="pull right btn btn-primary">Submit</button>
                                </ol>
                               
                            </form>


    
                </div> 
            </div>
        </div>
    </div>