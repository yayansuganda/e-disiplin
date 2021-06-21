
    {!! Form::model($model,[
        'route'=> 'import',
        'method'=> 'POST',
        'enctype' => 'multipart/form-data'
    ]) !!}

    <div class="row">
        <div class="col-md-10 offset-md-1">



    <div class="form-group row m-b-10">
        <label class="col-md-3 text-md-right col-form-label">Tahun</label>
        <div class="col-md-7">
            <div class="input-group date datepicker-default"   data-date-format="yyyy" >
                {!! Form::text('tahun',null, ['class' => 'form-control', 'id'=>'tahun']) !!}
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
    </div>

    <div class="form-group row m-b-10">
        <label class="col-md-3 text-md-right col-form-label">Bulan</label>
        <div class="col-md-7">
            <select id="bulan" name="bulan" class="default-select2 form-control detail">
                <option label="---pilih---">
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>


            </select>
        </div>
    </div>

    <div class="form-group row m-b-10">
        <label class="col-md-3 text-md-right col-form-label">File Upload</label>
        <div class="col-md-7">
            <input type="file" name="file" id="file" class="form-control">
        </div>
    </div>
    <br>

</div>
</div>

{!! Form::close() !!}


<script>
$('#tahun').datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years"
    });

</script>
