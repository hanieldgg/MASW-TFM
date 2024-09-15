import { NgModule } from '@angular/core';
import { PreloadAllModules, RouterModule, Routes } from '@angular/router';
import { EntriesComponent } from './templates/entries/entries.component';

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
];

@NgModule({
    imports: [
        RouterModule.forRoot(routes, { preloadingStrategy: PreloadAllModules }),
    ],
    exports: [RouterModule],
})
export class AppRoutingModule {}
