import React, {useContext} from 'react';
import {Navigate, Routes} from "react-router";
import {BrowserRouter, Route} from "react-router-dom";
import About from "../pages/About";
import Posts from "../pages/Posts";
import Error from "../pages/Error";
import PostIdPage from "../pages/PostIdPage";
import {privateRoutes, publicRoutes} from "../router";
import {AuthContext} from "../context";

const AppRouter = () => {
    const  {isAuth,setIsAuth}=useContext(AuthContext)
    return (
        isAuth
        ?  <Routes>
                {privateRoutes.map(
                    ({ path, exact, component}) =>
                        <Route
                            key={path}
                            path={path}
                            element={component}
                            exact={exact} />
                )}

            </Routes>
            : <Routes>
                {publicRoutes.map(
                    ({ path, exact, component}) =>
                        <Route
                            key={path}
                            path={path}
                            element={component}
                            exact={exact} />
                )}

            </Routes>
    );
};

export default AppRouter;