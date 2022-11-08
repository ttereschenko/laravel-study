const withLocalStorage = (key, WrapperedComponent) => {
    function WithLocalStorage(props) {
        const save = (data) => {
            localStorage.setItem(key, data);
        }

        const load = () => {
            return localStorage.getItem(key);
        }

        return (
            <WrapperedComponent save={save} load={load} {...props} />
        );
    }
    return WithLocalStorage;
}

export default withLocalStorage;