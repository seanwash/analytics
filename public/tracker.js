(function () {
    function page() {
        const { pathname, protocol, host } = window.location;

        if (pathname === sessionStorage.lastPathName) return;
        sessionStorage.lastPathName = pathname;

        send([
            { name: 'h', value: `${protocol}//${host}` },
            { name: 'p', value: pathname },
        ]);
    }

    function send(params) {
        if (localStorage.disableAnalytics === 'true') {
            console.log('Analytics disabled', params);
        }

        params.push({ name: 'ss', value: screensize() });
        params.push({ name: 'cc', value: Intl.DateTimeFormat().resolvedOptions().timeZone });

        const qs = params.map((v) => `${v.name}=${encodeURIComponent(v.value)}`).join('&');
        const url = `${scriptOrigin()}/t/${website()}?${qs}`;

        fetch(url, {
            mode: 'no-cors',
            headers: {
                'Content-Type': 'application/json',
                Accept: 'application/json',
            },
        }).catch((err) => console.log('Error:', err));
    }

    let _script = null;

    function script() {
        if (!_script) {
            _script = document.querySelector('script[data-website]');
        }
        return _script;
    }

    function screensize() {
        const w = window.screen.width;
        const h = window.screen.height;
        return `${Math.round(w / 100) * 100}x${Math.round(h / 100) * 100}`;
    }

    function website() {
        return script().getAttribute('data-website');
    }

    function scriptOrigin() {
        return script()
            .getAttribute('src')
            .match(/https:\/\/[^/]*/)[0];
    }

    page();
})();
