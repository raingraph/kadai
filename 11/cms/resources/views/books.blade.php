
@extends('layouts.app')
@section('content')
<!-- Bootstrap の定形コード… -->
<div class="panel-body">
	<!-- バリデーションエラーの表示に使用-->
	@include('common.errors')
	<!-- 本登録フォーム -->
	<form action="{{url('books')}}"	method="POST" class="form-horizontal">
		{{csrf_field()}}
		<!-- 本のタイトル -->
		<!--<div class="form-group">-->
		<!--	<label for="book" class="col-sm-3 control-label">Book</label>-->
		<!--	<div class="col-sm-6">-->
		<!--		<input type="text" name="item_name"	id="book-name" class="form-control">-->
		<!--	</div>-->
		<!-- 何冊 -->
		<!--	<label for="book" class="col-sm-3 control-label">冊数</label>-->
		<!--	<div class="col-sm-6">-->
		<!--		<input type="text" name="item_number"	id="book-number" class="form-control">-->
		<!--	</div>-->
		<!-- 金額 -->
		<!--	<label for="book" class="col-sm-3 control-label">金額</label>-->
		<!--	<div class="col-sm-6">-->
		<!--		<input type="text" name="item_amount"	id="book-amount" class="form-control">-->
		<!--	</div>-->
		<!-- 本公開日時 -->
		<!--	<label for="book" class="col-sm-3 control-label">本公開日時</label>-->
		<!--	<div class="col-sm-6">-->
		<!--		<input type="date" name="published"	id="book-published" class="form-control" placeholder="年 / 月 / 日">-->
		<!--	</div>-->
		<!--</div>-->

           <!-- 本のタイトル -->
            <div class="form-group">
                
                <div class="col-sm-6">
                    <label for="book" class="col-sm-3 control-label">Book</label>
                    <input type="text" name="item_name" id="book-name" class="form-control">
                </div>
                
                <div class="col-sm-6">
                    <label for="amount" class="col-sm-3 control-label">金額</label>
                    <input type="text" name="item_amount" id="book-amount" class="form-control">
                </div>
                
                <div class="col-sm-6">
                    <label for="number" class="col-sm-3 control-label">数</label>
                    <input type="text" name="item_number" id="book-number" class="form-control">
                </div>
                
                  <div class="col-sm-6">
                    <label for="published" class="col-sm-3 control-label">公開日</label>
                    <input type="date" name="published" id="book-published" class="form-control">
                </div>    
                
            </div>


		<!-- 本 登録ボタン -->
		<div class="form-group">
			<div class="col-sm-offset-3	col-sm-6">
				<button	type="submit" class="btn btn-default">
				    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
				    <i class="fa fa-plus"></i>Save
				</button>
			</div>
		</div>
	</form>
</div>

<!-- 現在の本 -->
@if (count($books) > 0)
<div class="panel panel-default">
	<div class="panel-heading">
		現在の本
	</div>
	<div class="panel-body">
		<table class="table table-striped task-table">
		<!-- テーブルヘッダ -->
		<thead>
			<th>本一覧</th>
			<th>&nbsp;</th>
		</thead>
<!-- テーブル本体 -->
		<tbody>
			@foreach ($books as $book)
			<tr>
			<!-- 本タイトル -->
				<td class="table-text">
					<div>{{ $book->item_name }}</div>
				</td>
	            <!-- 本: 更新ボタン -->
	            <td>
	                <form action="{{ url('booksedit/'.$book->id) }}" method="POST">
	                    {{ csrf_field() }}
	                    <button type="submit" class="btn btn-primary">
	                        <i class="glyphicon glyphicon-refresh"></i> 更新
	                    </button>
	                </form>
	            </td>
			<!-- 本:削除ボタン -->
				<td>
                    <form action="{{ url('book/'.$book->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                        <i class="fa fa-trash"></i>削除
                    </button>
                    </form>
				</td>
			</tr>
			@endforeach
		</tbody>
		</table>
	</div>
</div>
@endif

<!-- Book:	既に登録されてる本のリスト -->
@endsection