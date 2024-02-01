import Echo from 'laravel-echo'

window.Echo = new Echo({
broadcaster: 'pusher',
key: 'a9d41da1ecb7224520ca',
cluster: 'ap2',
forceTLS: true
});

var channel = Echo.channel('my-channel');
channel.listen('.my-event', function(data) {
alert(JSON.stringify(data));
});
