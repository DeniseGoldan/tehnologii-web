<?php
  namespace App\Support;

  use Illuminate\Pagination\LengthAwarePaginator;
  use Illuminate\Support\Collection as BaseCollection;

class Collection extends BaseCollection {

  public function paginate( $numberOfItemsPerPage, $total = null, $page = null, $pageName = 'page' ) {

    $page = $page ?: LengthAwarePaginator::resolveCurrentPage( $pageName );
      
    return new LengthAwarePaginator( $this->forPage( $page, $numberOfItemsPerPage ), $total ?: $this->count(), $numberOfItemsPerPage, $page, [
        'path' => LengthAwarePaginator::resolveCurrentPath(),
        'pageName' => $pageName,
      ]);
    }

}