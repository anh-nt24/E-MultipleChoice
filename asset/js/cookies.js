
const addToCookies = (id) => {
    setCookie('Quiz', id);
}

const getCookie = (name) => {
    var c = document.cookie;
    if (!c.includes(name) || c.includes(name+'=;')) {
        return [];
    }
    c = c.split(name+'=')[1];
    c = c.split(';')[0];
    return JSON.parse(c);
}

const setCookie = (name, val) => {
    var cur = getCookie(name);
    cur.push([val, new Date(Date.now())]);
    document.cookie = `${name} =  ${JSON.stringify(cur)}`;
}