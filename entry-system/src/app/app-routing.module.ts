import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

import { EntriesComponent } from './templates/entries/entries.component';
import { EnterComponent } from './templates/enter/enter.component';
import { CheckoutComponent } from './templates/checkout/checkout.component';
import { OrdersComponent } from './templates/orders/orders.component';
import { LoginComponent } from './templates/login/login.component';
import { RegisterComponent } from './templates/register/register.component';
import { ClientDashboardComponent } from './templates/client-dashboard/client-dashboard.component';
import { AuthGuardService } from './guards/auth.guard';
import { MyAccountComponent } from './templates/my-account/my-account.component';

const routes: Routes = [
    {
        path: '',
        canActivate: [AuthGuardService],
        component: ClientDashboardComponent,
        children: [
            {
                path: '',
                redirectTo: 'account',
                pathMatch: 'full',
            },
            {
                path: 'entries',
                component: EntriesComponent,
            },
            {
                path: 'enter',
                component: EnterComponent,
            },
            {
                path: 'checkout',
                component: CheckoutComponent,
            },
            {
                path: 'orders',
                component: OrdersComponent,
            },
            {
                path: 'account',
                component: MyAccountComponent,
            },
        ],
    },
    {
        path: 'login',
        component: LoginComponent,
    },
    {
        path: 'register',
        component: RegisterComponent,
    },
    {
        path: '**',
        redirectTo: 'account',
        pathMatch: 'full',
    },
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
    ],
    exports: [RouterModule],
})
export class AppRoutingModule {}
