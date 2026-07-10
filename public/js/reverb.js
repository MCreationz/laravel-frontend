console.log("Reverb JS Loaded");

Pusher.logToConsole = true;

const pusher = new Pusher('3gyjrqs4szrw52xxe2bq', {
    wsHost: '127.0.0.1',
    wsPort: 8080,
    forceTLS: false,
    enabledTransports: ['ws'],
});

const channel = pusher.subscribe('test');

channel.bind('message.sent', function (data) {
    console.log(data);
    alert(data.message);
});