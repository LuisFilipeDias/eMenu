package com.androidbegin.sidemenututorial;
/**
 *  A LinearLayout that draws a rounded rectangle around the child View that was added to it.
 */

import android.app.Activity;
import android.content.Context;
import android.graphics.Canvas;
import android.graphics.Paint;
import android.graphics.Rect;
import android.graphics.RectF;
import android.util.AttributeSet;
import android.util.DisplayMetrics;
import android.widget.LinearLayout;

/**
 * A LinearLayout that has rounded corners instead of square corners.
 * 
 * @author Danny Remington
 * 
 * @see LinearLayout
 * 
 */
public class RoundedRectangle extends LinearLayout {
 private int mInteriorColor;

 public RoundedRectangle(Context p_context) {
  super(p_context);
 }

 public RoundedRectangle(Context p_context, AttributeSet attributeSet) {
  super(p_context, attributeSet);
 }

 // Listener for the onDraw event that occurs when the Layout is drawn.
 protected void onDraw(Canvas canvas) {
  Rect rect = new Rect(0, 0, getWidth(), getHeight());
  RectF rectF = new RectF(rect);
  DisplayMetrics metrics = new DisplayMetrics();
  Activity activity = (Activity) getContext();
  activity.getWindowManager().getDefaultDisplay().getMetrics(metrics);
  float density = metrics.density;
  int arcSize = Math.round(density * 10);

  Paint paint = new Paint();
  paint.setColor(mInteriorColor);

  canvas.drawRoundRect(rectF, arcSize, arcSize, paint);
 }

 /**
  * Set the background color to use inside the RoundedRectangle.
  * 
  * @param Primitive int - The color inside the rounded rectangle.
  */
 public void setInteriorColor(int interiorColor) {
  mInteriorColor = interiorColor;
 }

 /**
  * Get the background color used inside the RoundedRectangle.
  * 
  * @return Primitive int - The color inside the rounded rectangle.
  */
 public int getInteriorColor() {
  return mInteriorColor;
 }

}