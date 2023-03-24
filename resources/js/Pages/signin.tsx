import { Head, useForm } from "@inertiajs/react";
import route from "ziggy-js";

export default function () {
    const { data, setData, post, processing, errors } = useForm({
        email: "",
        password: "",
        remember: false,
    });

    function handleSignIn(e) {
        e.preventDefault();
        post(route("authenticated-session.store"));
    }

    return (
        <>
            <Head title="Sign In" />

            <form onSubmit={handleSignIn} className="space-y-4">
                {errors.email && <p className="mb-4 text-red-500">{errors.email}</p>}

                <div>
                    <label className="block" htmlFor="email">
                        Email Address
                    </label>
                    <input
                        id="email"
                        type="email"
                        className="dark:bg-black"
                        required
                        value={data.email}
                        onChange={(e) => setData("email", e.target.value)}
                    />
                </div>

                <div>
                    <label className="block" htmlFor="password">
                        Password
                    </label>
                    <input
                        id="password"
                        type="password"
                        className="dark:bg-black"
                        value={data.password}
                        onChange={(e) => setData("password", e.target.value)}
                    />
                </div>

                <button type="submit" disabled={processing}>
                    Sign In
                </button>
            </form>
        </>
    );
}
