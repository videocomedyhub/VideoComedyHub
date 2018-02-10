<!-- search Widget -->
<div class="large-12 medium-7 medium-centered columns">
    <div class="widgetBox">
        <div class="widgetTitle">
            <h5>Search Videos</h5>
        </div>
        <form id="searchform" method="get" role="search" action="{{route('search')}}">
            {{ csrf_field() }}
            <div class="input-group">
                <input class="input-group-field" name="search" type="text" placeholder="Enter your keyword">
                <div class="input-group-button">
                    <input type="submit" class="button" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
<!-- End search Widget -->