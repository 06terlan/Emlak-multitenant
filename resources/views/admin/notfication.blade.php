@foreach ($announcements as $announcement)
    <li>
        <a href="{{ route('announcement_info', $announcement->id) }}">
            <span>
                <span>{{  str_limit(strip_tags($announcement->header), 25, '...') }}</span>
                <span class="time">{{ App\Library\Date::diffForHumans( $announcement->created_at ) }} ago</span>
            </span>
            <span class="message">
                {{ str_limit(strip_tags($announcement->content), 40, '...') }}
            </span>
        </a>
    </li>
@endforeach