@extends('layouts.index')

@section('content')

<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
							</div>
						</div>
					</div>
				</div>
<div class="page-inner mt--5">
	<div class="row">
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body ">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-primary bubble-shadow-small">
								<i class="fas fa-users"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Users</p>
								
								<h4 class="card-title">{{ $user }}</h4>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-info bubble-shadow-small">
								<i class="far fa-newspaper"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Article</p>
								<h4 class="card-title">{{ $article }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-success bubble-shadow-small">
								<i class="fas fa-tags"></i>
							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Categories</p>
								<h4 class="card-title">{{ $category }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-6 col-md-3">
			<div class="card card-stats card-round">
				<div class="card-body">
					<div class="row align-items-center">
						<div class="col-icon">
							<div class="icon-big text-center icon-secondary bubble-shadow-small">
								<i class="fas fa-film"></i>

							</div>
						</div>
						<div class="col col-stats ml-3 ml-sm-0">
							<div class="numbers">
								<p class="card-category">Banner</p>
								<h4 class="card-title">{{ $banner }}</h4>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="card full-height">
				<div class="card-header">
					<div class="card-head-row">
						<div class="card-title">Article List</div>
						<hr>
						<h6 style="color: white;"><a href="/articles" class="btn btn-primary ml-auto">ARTICLE PAGE</a></h6>
					</div>
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<div class="table-responsive">
							<table id="add-row" class="display table table-striped table-hover text-light" >
								<thead>
									<tr>
										<th>No.</th>
										<th>Title</th>
										<th>Slug</th>
										<th>Categories</th>
										<th>Author</th>
										<th>Images</th>
									</tr>
								</thead>
								<tbody>
									@foreach ($articles as $key => $row)
										<tr>
											<td scope="row">{{ $key + 1 }}</td>
											<td>{{ $row->title }}</td>
											<td>{{ $row->slug }}</td>
											<td>{{ $row->categories->category_name }}</td>
											<td>{{ $row->users->name }}</td>
											<td><img src=" {{ asset('uploads/'. $row->article_img)}} " width="80" height="80"></td>
												</form>
											</td>
										</tr>
									@endforeach
				
								</tbody>
							</table>
						</div>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

@endsection

