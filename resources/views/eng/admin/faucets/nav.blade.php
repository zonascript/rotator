<ul id="second-nav" class="nav nav-tabs">
    <li> <a href="{{ url('admin/'.$faucetName) }}">List Published/Paid</a> </li>
    <li> <a href="{{ url('admin/'.$faucetName.'/create') }}">New</a> </li>
    <li> <a href="{{ url('admin/'.$faucetName.'/no-published') }}">No Published</a> </li>
    <li> <a href="{{ url('admin/'.$faucetName.'/no-browser') }}">No Browser</a> </li>
    <li> <a href="{{ url('admin/'.$faucetName.'/no-paid') }}">No Paid</a> </li>
</ul>
