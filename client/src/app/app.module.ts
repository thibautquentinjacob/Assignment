import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';

import { FormsModule } from '@angular/forms';
import { HttpClientModule } from '@angular/common/http';

import { AppComponent } from './app.component';
import { MzNavbarModule, MzCardModule, MzSwitchModule, MzCheckboxModule,
         MzTooltipModule, MzToastService, MzModalModule } from 'ng2-materialize';
import { SectionComponent } from './components/section/section.component';
import { DishComponent } from './components/dish/dish.component';
import { RatingComponent } from './components/rating/rating.component';
import { DishListComponent } from './components/dish-list/dish-list.component';
import { DishesApiService } from './services/dishes-api.service';
import { CartService } from './services/cart.service';


@NgModule({
  declarations: [
    AppComponent,
    SectionComponent,
    DishComponent,
    RatingComponent,
    DishListComponent
  ],
  imports: [
    HttpClientModule, FormsModule,
    BrowserModule, BrowserAnimationsModule,
    MzNavbarModule, MzCardModule, MzSwitchModule, MzCheckboxModule,
    MzTooltipModule, MzModalModule
  ],
  providers: [DishesApiService, CartService, MzToastService],
  bootstrap: [AppComponent]
})
export class AppModule { }
