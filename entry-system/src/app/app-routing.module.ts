import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';

import { EntriesComponent } from './templates/entries/entries.component';
import { EnterComponent } from './templates/enter/enter.component';
import { CheckoutComponent } from './templates/checkout/checkout.component';

const routes: Routes = [
    {
        path: '',
        redirectTo: 'entries',
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
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
    ],
    exports: [RouterModule],
})
export class AppRoutingModule {}
