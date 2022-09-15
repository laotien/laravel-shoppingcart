@php use App\Helpers\Template @endphp
<div class="tab-content text-muted">
    <div class="tab-pane active" id="productnav-all" role="tabpanel">
        <div id="table-wrapper" class="table-card gridjs-border-none">
            <table class="table align-middle" id="categoryTable">
                <thead class="table-light text-muted">
                <tr>
                    <th scope="col" style="width: 50px;">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="checkAll">
                        </div>
                    </th>
                    <th>{{ __('Name') }}</th>
                    <th>{{ __('Slug') }}</th>
                    <th>{{ __('Created') }}</th>
                    <th>{{ __('Author') }}</th>
                    <th>{{ __('Status') }}</th>
                    <th>{{ __('Action') }}</th>
                </tr>
                </thead>
                <tbody class="list form-check-all">
                @if (count($items) > 0)
                    @foreach ($items as $key => $item)
                        @php
                            $name = Template::categoriesNested($item['name'], $item['depth']);
                            $slug =  $item['slug'];
							$id = $item['id'];
							$byCreateUser =  \App\Models\User::find($item['create_user'])->first()->name;
                            $createdHistory = Template::showItemHistory($item['created_at']);
                            $updatedHistory = Template::showItemHistory($item['updated_at']);
                            $status = Template::showItemStatus($item['status']);
                        @endphp
                        <tr>
                            <th scope="row">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="chk_child" value="{{ $id }}">
                                </div>
                            </th>
                            <td>{!! $name  !!}</td>
                            <td>{!! $slug !!}</td>
                            <td>{!! $createdHistory !!}</td>
                            <td>{!! $byCreateUser !!}</td>
                            <td>{!! $status !!}</td>
                            <td>
                                <ul class="list-inline hstack gap-2 mb-0">
                                    <li class="list-inline-item edit" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="Edit">
                                        <a href="{{ route('category.form', ['id' => $id]) }}"
                                           class="text-primary d-inline-block edit-item-btn">
                                            <i class="ri-pencil-fill fs-16"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item" data-bs-toggle="tooltip"
                                        data-bs-trigger="hover" data-bs-placement="top" title="Remove">
                                        <a class="text-danger d-inline-block remove-item-btn"
                                           data-bs-toggle="modal" href="#deleteRecordModal"
                                           data-url="{{ route('category.destroy', ['id' => $id]) }}">
                                            <i class="ri-delete-bin-5-fill fs-16"></i>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                @else
                    @include('admin.components.list-empty', ['colspan' => 7])
                @endif
                </tbody>
            </table>
        </div>
    </div>
    <!-- end tab pane -->
</div>
<!-- end tab content -->
