<table class="table table-striped table-sm table-responsive-md">
    <caption>{{ trans_choice('media.count', $media->count()) }}</caption>
    <thead>
        <tr>
            <th>@lang('media.attributes.image')</th>
            <th>@lang('media.attributes.name')</th>
            <th>@lang('media.attributes.url')</th>
            <th>@lang('media.attributes.posted_at')</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($media as $medium)
            <tr>
                <td>
                    <a href="{{ $medium->getUrl() }}" target="_blank">
                        <img src="{{ $medium->getUrl('thumb') }}" alt="{{ $medium->name }}" width="100">
                    </a>
                </td>
                <td>{{ $medium->name }}</td>
                <td>
                    <div class="input-group">
                        <input
                            id="medium-{{ $medium->id }}"
                            type="text"
                            class="form-control"
                            readonly
                            value="{{ url($medium->getUrl()) }}"
                        >

                        <div class="input-group-append">
                            <button class="input-group-text btn" data-clipboard-target="#medium-{{ $medium->id }}">
                                <x-icon name="clipboard" prefix="fa-regular" />
                            </button>
                        </div>
                    </div>
                </td>
                <td>{{ humanize_date($medium->posted_at, 'd/m/Y H:i:s') }}</td>
                <td>
                    <a href="{{ $medium->getUrl() }}" title="{{ __('media.show') }}" class="btn btn-primary btn-sm" target="_blank">
                        <x-icon name="eye" prefix="fa-regular" />
                    </a>

                    <a href="{{ route('admin.media.show', $medium) }}" title="{{ __('media.download') }}" class="btn btn-primary btn-sm">
                        <x-icon name="download" />
                    </a>

                    <form action="{{ route('admin.media.destroy', $medium) }}" method="POST" class="form-inline" data-confirm="@lang('forms.media.delete')">
                        @method('DELETE')
                        @csrf

                        <button type="submit" name="submit" class="btn btn-danger btn-sm" title="@lang('media.delete')">
                            <x-icon name="trash" />
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
