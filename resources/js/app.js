import './bootstrap';
import './echo';

console.log('App JS Loaded');

window.Echo.channel('test')
    .listen('.message.sent', (e) => {
        console.log('Received:', e);
        alert(e.message);
    });