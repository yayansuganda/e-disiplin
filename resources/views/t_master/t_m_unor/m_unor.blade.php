@extends('layouts.sidebar2')

@section('content')

<div id="content" class="content">

    <div class="col-lg-12">
        <!-- begin breadcrumb -->
    <ol class="pull-right">
            <a href="{{url('m_unor')}}" class="btn btn-sm btn-success" title="Refresh" data-toggle="modal">Refresh Data</a>
        </ol>
        <!-- end breadcrumb -->
        <!-- begin page-header -->
        <h1 class="page-header">Data Unit Organisasi (UNOR)</h1>
        <!-- end page-header -->
        <!-- begin panel -->
        <div class="panel panel-inverse" data-sortable-id="tree-view-1">
            <div class="panel-heading">
                <div class="panel-heading-btn">
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                    <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                </div>
                <h4 class="panel-title">Data UNOR</h4>
            </div>
            <div class="panel-body">
                    
                <div id="jstree-default">
                    <ul> 
                        <li data-jstree='{ "icon" : "fa fa-plus fa-lg text-primary" }'>
                            <strong><a href="{{route('m_skpd.create')}}" class=" modal-show" title="Create SKPD" data-toggle="modal">Add New Data</a></strong>
                        </li>
                        @foreach ($unor as $item)
                        <li>
                            <strong><a href="{{route('m_skpd.destroy', $item->id_m_skpd)}}" class="btn-delete btn-icon btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></i></a></strong> ||                            
                            <strong><a href="{{route('m_skpd.edit', $item->id_m_skpd)}}" class="modal-show edit ">{{$item->nama_m_skpd}}</a></strong>                            
                            <ul>
                                <li data-jstree='{ "icon" : "fa fa-plus fa-lg text-primary" }'>
                                    <strong><a href="{{route('create_data.unor_bidang', $item->id_m_skpd)}}" class=" modal-show" title="Create SKPD" data-toggle="modal">Add New Data</a></strong>
                                </li>
                                
                                @foreach ($item->bidang as $item_bidang)
                                <li >
                                    <strong><a href="{{route('m_unor.destroy', $item_bidang->id_m_skpd_bidang)}}" class="btn-delete btn-icon btn-danger btn-sm" title={{$item_bidang->nama_m_skpd_bidang}}><i class="fa fa-trash"></i></a></strong> ||                            
                                    <strong><a href="{{route('edit_data.unor_bidang', $item_bidang->id_m_skpd_bidang)}}" class="modal-show edit ">{{$item_bidang->nama_m_skpd_bidang}}</a></strong>
                                    
                                    <ul>
                                        <li data-jstree='{ "icon" : "fa fa-plus fa-lg text-primary" }'>
                                            <strong><a href="{{route('create_data.unor_subbidang', $item_bidang->id_m_skpd_bidang)}}" class=" modal-show" title="Create SKPD" data-toggle="modal">Add New Data</a></strong>
                                        </li>
                                        @foreach ($item_bidang->subbidang as $item_subbidang)
                                            <li>
                                                 <strong><a href="{{route('subbidang.hapus', $item_subbidang->id_m_skpd_subbidang)}}" class="btn-delete btn-icon btn-danger btn-sm" title={{$item_subbidang->nama_m_skpd_subbidang}}><i class="fa fa-trash"></i></a></strong> ||                                                                                                                        
                                                <strong><a href="{{route('edit_data.unor_subbidang', $item_subbidang->id_m_skpd_subbidang)}}" class="modal-show edit ">{{$item_subbidang->nama_m_skpd_subbidang}}</a></strong></li>
                                        <@endforeach
                                    </ul>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <!-- end panel -->
    </div>
    <!-- end col-6 -->


 


</div>
<!-- end #content -->

@endsection

