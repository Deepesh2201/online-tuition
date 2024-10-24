import { init, dispose } from 'lib-jitsi-meet';

const domain = 'https://meet.jit.si';
const options = {
    roomName: 'your-room-name',
    width: '100%',
    height: 600,
    parentNode: document.querySelector('#jitsi-container'),
    configOverwrite: {},
    interfaceConfigOverwrite: {},
};

init(options);

window.onbeforeunload = () => {
    dispose();
};
