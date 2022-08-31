<div class="tab-content text-muted">
    <div class="tab-pane active" id="productnav-all" role="tabpanel">
        <div id="table-product-list-all" class="table-card gridjs-border-none">
            <table class="table align-middle" id="categoryTable">
                <thead class="table-light text-muted">
                <tr>
                    <th scope="col" style="width: 50px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAll" value="option">
                        </div>
                    </th>
                    <th class="sort" data-sort="name">{{ __('Name') }}</th>
                    <th class="sort" data-sort="slug">{{ __('Slug') }}</th>
                    <th class="sort" data-sort="created">{{ __('Created') }}</th>
                    <th class="sort" data-sort="updated">{{ __('Updated') }}</th>
                    <th class="sort" data-sort="status">{{ __('Status') }}</th>
                    <th class="sort" data-sort="action">{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="list form-check-all">
                    @if (count($items) > 0)
                        @foreach ($items as $key => $item)
                              @php
                                  $name = $item['name'];
								  $slug =  $item['slug'];
								  $status = $item['status'];
                              @endphp
                            <tr>
                                <th scope="row">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="chk_child" value="option1">
                                    </div>
                                </th>
                                <td class="id" style="display:none;">
                                    <a href="javascript:void(0);" class="fw-medium link-primary">#VZ2101</a>
                                </td>
                                <td class="name">{{ $name }}</td>
                                <td class="slug">{{ $slug }}</td>
                                <td class="phone">580-464-4694</td>
                                <td class="date">06 Apr, 2021</td>
                                <td class="status"><span class="badge badge-soft-success text-uppercase">{{ $status }}</span></td>
                                <td>
                                    <ul class="list-inline hstack gap-2 mb-0">
                                        <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                            data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                            <a href="#showModal" data-bs-toggle="modal"
                                               class="text-primary d-inline-block edit-item-btn">
                                                <i class="ri-pencil-fill fs-16"></i>
                                            </a>
                                        </li>
                                        <li class="list-inline-item" data-bs-toggle="tooltip"
                                            data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                            <a class="text-danger d-inline-block remove-item-btn"
                                               data-bs-toggle="modal" href="#deleteRecordModal">
                                                <i class="ri-delete-bin-5-fill fs-16"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tab pane -->

    <div class="tab-pane" id="productnav-published" role="tabpanel">
        <div id="table-product-list-published" class="table-card gridjs-border-none"></div>
    </div>
    <!-- end tab pane -->

    <div class="tab-pane" id="productnav-draft" role="tabpanel">
        <div class="py-4 text-center">
            <lord-icon src="https://cdn.lordicon.com/msoeawqm.json"
                       trigger="loop" colors="primary:#405189,secondary:#0ab39c"
                       style="width:72px;height:72px">
            </lord-icon>
            <h5 class="mt-4">Sorry! No Result Found</h5>
        </div>
    </div>
    <!-- end tab pane -->
</div>
