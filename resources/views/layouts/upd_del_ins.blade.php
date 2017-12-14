@if (isset($delete) && ($delete === true))
    <p class="text-success">Delete success</p>
@elseif (isset($update) && ($update === true))
    <p class="text-success">Update success</p>
@elseif (isset($insert) && ($insert === true))
    <p class="text-success">Insert success</p>
@endif